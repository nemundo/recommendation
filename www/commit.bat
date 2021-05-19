SET /P message=Git Message:

git add *
git update-index --chmod=+x deploy
git commit -m "%message%"
git push
