const fs = require('fs');
const path = require('path');

class TodoRepository{

    constructor(app_path){

        // process.cwd() = path d'exécusion de script
        this.app_path = path.resolve(__dirname,app_path ) ;
        this.todoLines = [];
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
    
            // ne pas traiter les dossier caché
            if(file.startsWith(".") ){
              continue
            }
            // ne pas traiter le dossier node_module,vendor
            if(file.endsWith("vendor") || file.endsWith("node_modules")){
              continue
            }
            this.traverse(filePath);
          } else if (stats.isFile()) {
            const content = fs.readFileSync(filePath, 'utf8');
            const lines = content.split(/\r?\n/);
            for (const line of lines) {
              if (line.trim().startsWith('// TODO')) {
                // Afficher un message sans retour à la ligne
                process.stdout.write('.'); 
                this.todoLines.push(filePath + ':' + line);
              }
            }
          }
        }
      }

}

module.exports = TodoRepository