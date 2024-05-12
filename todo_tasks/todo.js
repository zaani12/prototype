const fs = require('fs');
// ├─ e:\labs-web\prototype\app\resources\views\layouts\app.blade.php line 7: TODO ESSARRAJ : à expliquer dans /docs/réalisation/layout.md -->
// ├─ e:\labs-web\prototype\docs\analyse-fonctionnelle\analyse-sprint1.md line 30: TODO : Donnez le diagramme de cas d'utilisation de sprint 1

const taskFilePath = './todo.txt';
const csvFilePath = './tasks.csv'; // Output CSV file path

const csvContent = [
    ['Apprenant','TODO_Tag','Question','File','Line'], // Header row
];


try {

  const tasksData = fs.readFileSync(taskFilePath, 'utf-8');
  const tasks = tasksData.split('\n');
  // ├─ e:\analyse-sprint1.md line 30: TODO : Donnez le diagramme de cas d'utilisation de sprint 1
  var regex = /^(?:\s*├─\s+)(.+?) (.+?):\s+(.*?)\s+(.*?)\s+:\s+(.*?)\s*$/;
  for (const taskLine of tasks) {
    const match = taskLine.match(regex);
    if (match) {
      const file_name = match[1];
      const line = match[2];
      const todo_tag = match[3];
      const apprenant_name = match[4];
      const question = match[5];

    //   console.log(`apprenant_name: ${apprenant_name}`);
    //   console.log(`- todo_tag: ${todo_tag}`);
    //   console.log(`- file_name: ${file_name}`);
    //   console.log(`- question: ${question}`);

      // CSV file
      csvContent.push([apprenant_name, todo_tag, question,file_name,line]); // Add task data to CSV content
    } else {
    //  console.warn('Invalid task format:', taskLine);
    }


  }

  const csvString = csvContent.map(row => row.join(',')).join('\n'); // Convert CSV content to comma-separated string
  fs.writeFileSync(csvFilePath, csvString, 'utf-8');
  console.log(`Tasks successfully written to CSV file: ${csvFilePath}`);

} catch (err) {
  console.error('Error reading tasks file:', err);
}

