#### Console commands

Show commands list - 'php ./index.php'

Instruction:
- Change db settings in App\Config;
- Run migration ('php ./migration.php') for create users table

Commands list:
- app:add-user [-u username -e email -p password] or [-f fake user]
- app:create-users - you can change count of new users [-c count users]; 
- app:all-users;
- app:search-user [-u username].