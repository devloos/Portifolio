## El Andariego

### Preview

![Homepage](assets/homepage.jpg)

### Repository Requirements

- nodejs (https://nodejs.org/en/download/package-manager)
- nvm (https://github.com/nvm-sh/nvm)
- python3 (https://www.python.org/downloads)
- mongodb compass (https://www.mongodb.com/try/download/shell)
- railway cli (https://docs.railway.app/guides/cli)

### Client Setup

Enter client directory

```
cd client
```

Install required node dependencies

```
npm install
```

Run client server (this runs on port 8080)

```
npm run dev
```

### Deployment

Activate python virtual env

```
source .venv/bin/activate
```

Run deploy script (follow instructions on screen)

```
python3 deploy.py
```

deactivate python virtual env

```
source .venv/bin/deactivate
```

### Todos

- Todos are found on notion!
