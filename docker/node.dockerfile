FROM node:20-alpine

WORKDIR /app

# This version stays alive even if there is no code yet
CMD ["sh", "-c", "if [ -f package.json ]; then npm install && node index.js; else tail -f /dev/null; fi"]