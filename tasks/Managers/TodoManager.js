const fs = require('fs');
const TodoRepository = require('../Repositories/TodoRepository');
class TodoManager{

    constructor(app_path){
      this.app_path = app_path;
    }

  
    /**
     * Export all todo task to csv file
     */
    export_to_csv(){

        let tasks = new TodoRepository(this.app_path).findAll();

        const csvFilePath = './tasks.csv'; // Output CSV file path
        const csvContent = [
            ['technology','level','description','file_path','line_number','todo_line'], // Header row
        ];
        
    
        for (const task of tasks) {
          csvContent.push([task.technology,task.level, task.description,task.file_path,task.line_number,task.todo_line]); // Add task data to CSV content
        }
        const csvString = csvContent.map(row => row.join(';')).join('\n'); // Convert CSV content to comma-separated string
        fs.writeFileSync(csvFilePath, csvString, {encoding:'utf16le'});
        console.log(`Tasks successfully written to CSV file: ${csvFilePath}`);

      }
        

}

module.exports = TodoManager