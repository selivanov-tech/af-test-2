Domain layer with possible structure:

- src/
  - Domain/
    - Exception/             # Domain layer exceptions
    - DomainName/            # i.e. Customer    
      - Entity/              # Related DB Entities  
      - Event/               # Events DTO (CustomerCreated) 
      - ValueObject/         # Related VO (i.e. Address)       
      - Repository/          # Repository Interfaces      
      - Service/             # Related Services (i.e. CustomerValidationService)
