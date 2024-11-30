# HTTP Client Directory

This directory contains HTTP client configuration files used for making API requests in different environments.

## Files
- `*.http`: These files contain HTTP requests that can be executed using the REST Client extension in Visual Studio Code.
- `http-client.env.json`: This file contains environment-specific configurations such as host URLs and bearer tokens for local and stage environments.

## Important Note

- `http-client.private.env.json`: This file should store sensitive information such as tokens and other personal data. **Ensure this file is excluded from the git tree** to prevent accidental exposure of sensitive information.

## Example of `http-client.private.env.json`

```json
{
  "local": {
    "bearerToken": "your-local-bearer-token"
  },
  "stage": {
    "bearerToken": "your-stage-bearer-token"
  },
  "prod": {
    "bearerToken": "your-prod-bearer-token"
  }
}
