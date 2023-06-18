Code Prompt
===========

Rough prototype of a slim UI to work with GPT on a code snippet.

![Screenshot](/screenshot.png)

Requirements
------------

* Git
* Node
* NPM
* PHP
* Symfony CLI

Setup
-----

To run this tool locally you can run:

```bash
git clone git@github.com:chr-hertel/code-prompt.git
cd code-prompt/api
composer install
symfony serve -d
cd ../ui
npm install
ng serve --open
```

Add file `api/.env.local` and paste OpenAI token:
```
OPENAI_API_KEY=sk-...
```
