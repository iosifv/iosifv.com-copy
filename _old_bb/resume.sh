
# Test Everything
# =======================================
npm install jsonresume-theme-stackoverflow
#npm install jsonresume-theme-stackoverflowed
#npm install jsonresume-theme-caffeine
#npm install jsonresume-theme-eleganter
#npm install jsonresume-theme-straightforward
#npm install jsonresume-theme-jupe
#npm install jsonresume-theme-stackunderflow
#npm install jsonresume-theme-elegant
#npm install jsonresume-theme-kendall
#npm install jsonresume-theme-eloquent
#npm install jsonresume-theme-slick
#npm install jsonresume-theme-light
#
#resume export generated/stackoverflowed.pdf  --theme stackoverflowed
#resume export generated/caffeine.pdf  --theme caffeine
#resume export generated/eleganter.pdf  --theme eleganter
#resume export generated/straightforward.pdf  --theme straightforward
#resume export generated/jupe.pdf  --theme jupe
#resume export generated/stackunderflow.pdf  --theme stackunderflow
#resume export generated/elegant.pdf  --theme elegant
#resume export generated/kendall.pdf  --theme kendall
#resume export generated/eloquent.pdf  --theme eloquent
#resume export generated/slick.pdf  --theme slick
#resume export generated/light.pdf  --theme light
#resume export generated/stackoverflowed.html --theme stackoverflowed
#resume export generated/caffeine.html --theme caffeine
#resume export generated/eleganter.html --theme eleganter
#resume export generated/straightforward.html --theme straightforward
#resume export generated/jupe.html --theme jupe

nvm use 12


# shellcheck disable=SC2164
cd resources/json-resume/

resume export generated/stackoverflow.pdf  --theme stackoverflow
resume export generated/stackoverflow.html --theme stackoverflow

cd ../..

cp resources/json-resume/generated/stackoverflow.html public/resume.html
cp resources/json-resume/generated/stackoverflow.pdf  public/resume.pdf
