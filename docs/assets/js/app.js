import { table_matiere } from "./table_matiere.app.js";
import { link_modifier} from "./link_modifier.app.js";
import { affichage_rapport_par_page,add_anchor_link_to_titles} from "./affichage_pages.app.js";

table_matiere();
link_modifier();
affichage_rapport_par_page();

add_anchor_link_to_titles();

// Activation de code highligh
hljs.highlightAll();

// TODO js-2 : Création d'un script javascript qui permet d'afficher les figure par numéro 

// TODO js-2 : Création d'un script javascript qui permet d'afficher un tableau des figures