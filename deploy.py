import os
import semver
from git import Repo

PORTFOLIO_VUE_PATH = '/Users/ca/Developer/Projects/Portfolio'
BRANCH = 'main'

answer = input("Are you sure you want to deploy? (yes/no) [no]: ")

# anything but yes
if (answer != 'yes'):
    exit(0)

if Repo(PORTFOLIO_VUE_PATH).active_branch.name != BRANCH:
    print(f"Not in {BRANCH} branch! [FAILED]")
    exit(1)

# check for latest changes
os.system(f"git pull origin {BRANCH}")

# push any pending changes
os.system('git add .')
os.system('git commit -m "deploy"')
os.system('git push')

os.chdir(PORTFOLIO_VUE_PATH + '/client')

client_version = os.popen(
    'node -p "require(\'./package.json\').version"').read()

ver = semver.Version.parse(client_version)

answer = input(
    f"The current version is {ver}, specify the next version: ")

match (answer):
    case 'major':
        ver = ver.bump_major()
    case 'minor':
        ver = ver.bump_minor()
    case 'patch':
        ver = ver.bump_patch()
    case _:
        print('Not valid semver semantics.')
        exit(1)

print(ver)

os.system('npm run build')

if int(os.popen('echo $?').read()) != 0:
    print('Error building Portfolio Vue! [FAILED]')
    exit(1)

os.system('rm -rf dist')

# deploy
# os.system('railway up --detach')
