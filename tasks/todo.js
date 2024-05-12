
const TodoManager = require('./Managers/TodoManager');

// Export all toto task to csv file
let todoManager = new TodoManager();
todoManager.export_to_csv();



