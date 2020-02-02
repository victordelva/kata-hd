# Víctor del Valle

## Installation steps

- `docker-compose up -d`
- `docker-compose exec back composer install`
- For back service `http://0.0.0.0:8080`
- For front app enter `http://127.0.0.0:3000`

If any change in code is made, run
- `docker-compose exec front npm run build`

You can watch for changes running
- `docker-compose exec front npm run watch`

## How to run your code

- `docker-compose up -d`
- For front enter `http://127.0.0.0:3000`

## Where to find your code
I separated backend and front-end in two folders. Back and Front.
Note we could add new services to this project.

Root folder contains docker files.

## What I would have done differently if I had had more time

- Validate parameters
- Improve company Authentication
- Rename Back folder
- Use MongoDB

## More

It's been a challenge for me doing this test in this short period of time,
since I've mostly used Lumen as micro-framework, that was forbidden for this test,
as It was Laravel or Symfony. 

I hope I proved with this test I can learn very fast, I can get used to any new framework very fast,
and can follow a proper architecture.