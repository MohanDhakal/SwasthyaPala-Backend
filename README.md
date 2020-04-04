# SwasthyaPala-Backend

APIs for the Swasthyapala-personal project.

**Swasthyapala is my original idea focusing on building healthy eating habits.**

## Iteration 1:
  ### PHASE I: User Detail
  
   This is the first phase of Iteration 1 where i have developed apis for storing and retrieving user information.
   The site is currently hosted at [localhost](https://swasthyapala.com).
   
   **Some Basics API calls are mentioned below:**
   
   ***Retrieve all user information:***
    
   - optional argument: "user_filter":String 
      
   - Description: if the argument is null API will return all the users in the
        database with all the column;
      
   - Example : if you want to retreive email of all the users:
      set user_filer to "email"
      
   __Only email and name are the available keyword for now__ 
      
      sample request: http://127.0.0.1/apis/swasthyapala/get_users.php?user_filter=email
  ----------------------------------------------------------------------------------------------
 
   ***Get lattitude and longitude of the user:***
   
   - required argument: "uid":int 
      
   - Description: if the argument is null API will return null.Return lat and long of the user if not null.
      
   - Example : if you want to retreive lattitude and longitude of the user with id 2 the do as below:
    
   __Only integers are available as uid no other datatype will work here__
      
       sample request: http://127.0.0.1/apis/swasthyapala/get_address_of_a_user.php?uid=2
     
   
