SET /P message=Git Message:

git add *
git commit -m "%message%"
git push
