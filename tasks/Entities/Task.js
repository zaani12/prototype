class Task{

    constructor(file_path,line_number,todo_line){

        this.file_path = file_path;
        this.line_number = line_number;
        this.todo_line = todo_line;
        this.description = "";
        this.technology = "";
        this.level = "";
        
        // TODO css-2 : Convert to function, and execute it after par load.
        var regex = /^(?:\s*\/\/\s+)(.+?)\s+(.+?)-(.+?)\s+:\s+(.*?)\s*$/;
        // regex = /\/\/ TODO : (.*)/;
        let match = this.todo_line.match(regex);

        if(match){
            this.technology = match[2];
            this.level = match[3];
            this.description = match[4];
           
        }
    }
}
module.exports = Task