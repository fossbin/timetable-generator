# Timetable Generator

A web-based timetable generator built with Bootstrap and PHP, designed for use in a college department. This tool helps automate the creation of class schedules with respect to batches, making it easier for faculty and staff to manage and organize timetables efficiently.

**Note:** This project is still in development and may have some incomplete features or bugs.

## Table of Contents
- [Features](#features)
- [Screenshots](#screenshots)
- [Installation](#installation)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Future Enhancements](#future-enhancements)
- [Credits](#credits)

## Features
- User-friendly web interface built with Bootstrap.
- Dynamic timetable creation using PHP with options to customize number of working days and hours of the day.
- Backup previously generated timetables and export them.
- Supports input of batch, subject & teacher details.
- Backend powered by XAMPP for local hosting.

## Screenshots

### Homepage
![Homepage](/screenshots/main.png)

### Timetable
![Timetable](/screenshots/timetable.png)

### Backup
![Backup and Search](/screenshots/backup.png)

### Batch Management
![Batch Management](/screenshots/batch.png)

### Programme Management
![Programme Management](/screenshots/programme.png)

### Faculty Management
![Faculty Management](/screenshots/faculty.png)

## Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) (Apache + MariaDB + PHP + Perl)

### Steps
1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/fossbin/timetable-generator.git
    ```
2. Move the project to the XAMPP `htdocs` directory:
    ```bash
    mv timetable-generator /path/to/xampp/htdocs/
    ```
3. Start the Apache and MySQL modules in the XAMPP control panel.
4. Open your browser and navigate to `http://localhost/timetable-generator`.

## Configuration
- Edit `class/db.php` to change the database connection settings 

## Contributing
Contributions are welcome! If you find any issues or have suggestions, please open an issue or submit a pull request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE.md) file for details.

## Contact
Created by [fossbin](https://github.com/fossbin)

## Future Enhancements
- Fix existing bugs and complete unfinished features.
- Provide more timetable customization,

## Credits
- Frontend: [Bootstrap](https://getbootstrap.com)
- Local Server: [XAMPP](https://www.apachefriends.org/index.html)
