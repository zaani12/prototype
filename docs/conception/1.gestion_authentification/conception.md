---
layout: default
chapitre: Conception
package : gestion_authentification
order: 520
---

## Conception : Gestion d'authentification



![Uses cases](/prototype/conception/1.gestion_authentification/images/uses-cases.svg)

<!-- new slide -->

### Diagramme de classes 


```mermaid
classDiagram
namespace gestion_authentifications {
class User {
    + id : int
    + login: String 
    + password: String 

}
class Role{
    + id : int
    + name: String 
    + description: String 
}
}
User "*" --> "1" Role
```
**Figure : Diagramme de classes : Gestion d'authentification**

<!-- new slide -->

<pre class="plantuml">
@startuml
title Use Case Diagram Example
actor Customer
usecase Login
usecase Place Order
usecase Manage Account
Customer -> Login
Customer -> Place Order
Customer -> Manage Account
@enduml

<pre>