import { Component } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

interface ServerResponse {
  language: string;
  code: string;
}

@Component({
  selector: 'code-prompt',
  templateUrl: './code-prompt.component.html',
  styleUrls: ['./code-prompt.component.scss'],
})
export class CodePromptComponent {
  language: string = 'javascript';
  editorOptions = {language: this.language};
  code: string = 'function x() {\n\tconsole.log("Hello world!");\n}';
  history: string[] = [];
  promptForm: FormGroup;
  promptText: FormControl;

  constructor(private http: HttpClient) {
    this.promptText = new FormControl('');
    this.promptForm = new FormGroup({
      prompt: this.promptText
    });
  }

  setCode(language: string, code: string) {
    // TODO: switch language
    this.code = code;
  }

  onSubmit() {
    const prompt = this.promptForm.value.prompt;
    const url = 'https://localhost:8000/code-prompt';
    const requestBody = {
      language: this.language,
      code: this.code,
      prompt: this.promptForm.value.prompt,
    };
  
    this.http.post<ServerResponse>(url, requestBody).subscribe(
      (response) => {
        this.promptForm.get('prompt')?.reset();
        this.history.unshift(prompt);
        this.setCode(response.language, response.code);
      },
      (error) => {
        console.error(error);
      }
    );
  }
}
