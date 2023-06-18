import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CodePromptComponent } from './code-prompt.component';

describe('CodePromptComponent', () => {
  let component: CodePromptComponent;
  let fixture: ComponentFixture<CodePromptComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CodePromptComponent]
    });
    fixture = TestBed.createComponent(CodePromptComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
