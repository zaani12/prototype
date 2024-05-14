const fs = require('fs');
const path = require('path');
const Task = require('../Entities/Task')

class TodoRepository{

    constructor(app_path){

        // process.cwd() = path d'exécusion de script
        this.app_path = path.resolve(__dirname,app_path ) ;
        this.todoLines = [];

        // Ne pas traiter les dossiers suivant : 
        // TODO : ne pas traiter tous les fichiers et dossier indiquer dans le fichier .gitignore
        this.directory_ignore = [".bundle",".vscode",".git",".github","_site","vendor","node_modules"]

        this.todo_comment_and_tag = ["// TODO","<!-- TODO"]
        

    }
    /**
     * find all todo in current Laravel app
     */
    findAll(){
        
        this.traverse(this.app_path);
        return this.todoLines;
    }

    /**
     * Une fonction récursive
     * @param {*} dir 
     */
    traverse(dir) {
      
        const files = fs.readdirSync(dir);
        for (const file of files) {
          const filePath = path.join(dir, file);
          const stats = fs.statSync(filePath);
          if (stats.isDirectory()) {
    
           
            // ne pas traiter le dossier node_module,vendor
            if(this.directory_ignore.includes(file)){
              continue
            }

            // ne pas traiter les dossier caché
            if(file.startsWith(".") ){
            continue
          }

            this.traverse(filePath);
          } else if (stats.isFile()) {
            const content = fs.readFileSync(filePath, 'utf8');
            const lines = content.split(/\r?\n/);

            lines.forEach((todo_line,index) => {

              // if (todo_line.trim().startsWith('// TODO')) {
              if(this.todo_comment_and_tag.some(element => todo_line.startsWith(element))){
                // Afficher un message sans retour à la ligne
                process.stdout.write('.'); 
                let num_line = index +1
                this.todoLines.push (new Task(filePath,num_line,todo_line));
              }
            });
          }
        }
      }

}

module.exports = TodoRepository