Infrastructure layer with possible structure:

- src
  - Infrastructure/        
    - Persistence/           # Repos concrete/implementation (i.e. Doctrine, S3, External API)       
    - Notification/          # Notifications concrete/implementation (i.e. Email, SMS)        
    - Console/               # Console commands, which always stores in bin/   
    - Http/                  # Could store i.e. Controllers
