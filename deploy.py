import os
from git import Repo

PORTFOLIO_VUE_PATH = '/Users/ca/Developer/Projects/Portfolio/portfolio-vue'
BRANCH = 'master'

answer = input("Are you sure you want to deploy? (yes/no) [no]: ")

# anything but yes
if (answer != 'yes'):
    exit(0)

if Repo(PORTFOLIO_VUE_PATH).active_branch.name != BRANCH:
    print(f"Not in {BRANCH} branch! [FAILED]")
    exit(1)

# check for latest changes
os.system('git pull origin master')

# push any pending changes
os.system('git add .')
os.system('git commit -m "deploy"')
os.system('git push')

# deploy
os.system('railway up --detach')
