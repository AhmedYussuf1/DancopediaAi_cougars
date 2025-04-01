 
 # Description:
   **name:** Dancopedia_AI\n
   **What the Project Deos:**:
   
 
## Project Description:
DancopediaAi is a web-based platform designed to provide users with comprehensive information about various dance styles, techniques, and histories. The project aims to serve as an educational resource for dance enthusiasts, students, and professionals. It features an intuitive interface, multimedia content, and a search functionality to explore dance-related topics efficiently. 
### Problem Statement:
The project addresses the lack of a centralized, accessible, and engaging platform for learning about diverse dance styles, techniques, and histories. Many existing resources are fragmented or lack depth, making it challenging for dance enthusiasts, students, and professionals to find reliable and comprehensive information. DancopediaAi aims to bridge this gap by providing a user-friendly platform enriched with multimedia content and efficient search capabilities.

## Installation and Usage:

### Prerequisites:
- Ensure you have [XAMPP](https://www.apachefriends.org/index.html) installed on your system.
- Download or clone the project repository to your local machine.

### Installation Steps:
1. Copy the project folder `DancopediaAi_cougars` to the `htdocs` directory of your XAMPP installation.
  ```
  /Applications/XAMPP/xamppfiles/htdocs/DancopediaAi_cougars
  ```
2. Start the XAMPP control panel and ensure that both Apache and MySQL services are running.
3. Open your web browser and navigate to:
  ```
  http://localhost/DancopediaAi_cougars
  ```
  4. create dabatase named  : 'dance_ai_db' then run the sql script provided or follow step 5.
  5. Import the database structure and data:
    - Open phpMyAdmin by navigating to:
      ```
      http://localhost/phpmyadmin
      ```
    - Select the `dance_ai_db` database.
    - Click on the "Import" tab.
    - Choose the SQL file provided in the `database` folder of the project directory (e.g., `dance_ai_db.sql`).
    - Click "Go" to execute the import.

  6. Verify the database setup:
    - Ensure the tables such as `users`, `dance_styles`, `techniques`, and `histories` are created in the `dance_ai_db` database.
    - Check that the data has been populated correctly.

  7. Update the database connection settings:
    - Open the `config.php` file in the project directory.
    - Ensure the database credentials match your local setup:
      ```php
      define('DB_HOST', 'localhost');
      define('DB_USER', 'root');
      define('DB_PASS', '');
      define('DB_NAME', 'dance_ai_db');
      ```
    - Save the changes.

  8. Reload the application in your browser to confirm the setup is complete.

### Usage:
- Use the search bar on the homepage to explore various dance styles, techniques, and histories.
- Navigate through the multimedia content to learn more about your favorite dance topics.
- Enjoy the intuitive interface designed for an engaging learning experience.
- For any issues, refer to the documentation or contact the project maintainers.

## Credits:
- **Project Lead:** Jane Doe  
- **Backend Development:** Corey Klooz
- **Frontend Development:** Ahmed Yussuf
- **Database Design:** Tue
- **UI/UX Design:** Yared
- **Content Creation:** Mou
- **Testing and QA:** David Lee  


##ChatGPT Integration:
We implemented a ChatGPT-powered chatbot that allows users to request information about specific dance genres. When a user inquires about a dance style, the chatbot provides relevant details. If the user wants to add the suggested dance to the database, they have the option to do so seamlessly. This integration enhances user interaction by offering an intelligent recommendation system while also expanding the database with new dance styles as needed.
- **User Accounts and Profiles:** Allow users to create accounts, save their favorite dance styles, and track their learning progress.
- **Interactive Tutorials:** Introduce step-by-step video tutorials for popular dance techniques.
- **Community Forum:** Add a discussion forum for users to share knowledge, ask questions, and connect with other dance enthusiasts.
- **Mobile App Integration:** Develop a mobile version of the platform for on-the-go learning.
- **AI-Powered Recommendations:** Implement AI algorithms to suggest dance styles and content based on user preferences and search history.
- **Multilingual Support:** Provide content in multiple languages to reach a broader audience.
- **Live Sessions:** Enable live streaming of dance classes and workshops hosted by professionals.
- **Gamification:** Add badges, achievements, and leaderboards to make learning more engaging and fun.
- **Accessibility Features:** Ensure the platform is accessible to users with disabilities by incorporating screen reader support and keyboard navigation.

## Feedback and Contributions:
We welcome feedback and contributions from the community to improve DancopediaAi. If you have suggestions, feature requests, or would like to contribute to the project, please reach out to us via the project's GitHub repository or contact the maintainers directly.
Special thanks to the open-source community and contributors for their support and resources.  
 
  ## Screen shots of the project: 
  **home page:**
![alt "Screen shots of the home page "](/images_read_me_page/home.png)

 
  ![alt "Screen shots of the home page "](/images_read_me_page/home2.png)
**Interactive map**
![alt "Screen shots of the interacive map page "](/images_read_me_page/interactive_map.png)

![alt "Screen shots of the interacive map page "](/images_read_me_page/interactive_map2.png)
