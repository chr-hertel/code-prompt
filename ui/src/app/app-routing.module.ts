import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CodePromptComponent } from './code-prompt/code-prompt.component';

const routes: Routes = [
  { path: '', component: CodePromptComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
