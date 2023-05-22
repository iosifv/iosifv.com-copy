#!/usr/bin/env sh

C_YELLOW=$(tput setaf 3)
C_RESET=$(tput sgr0)

print_status() {
  echo "${C_YELLOW} => ${1}${C_RESET}";
}

print_status "Make sure needed packages are installed"
npm i -g resume-cli jsonresume-theme-stackoverflow

cd resources/json-resume || exit

print_status "Generating PDF"
resume export --theme stackoverflow resume.pdf

print_status "Generating HTML"
resume export --theme stackoverflow resume.html

cd ..
cd ..


print_status "Running npm"
npm run dev

print_status "Done"
