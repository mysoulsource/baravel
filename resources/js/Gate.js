export default class Gate{
    constructor(authuser){
        this.authuser = authuser;
    }
    isAdmin(){
        return this.authuser.type === 'admin';
    }
    isUser(){
        return this.authuser.type === 'user';
    }
    isAuthor(){
        return this.authuser.type === 'author';
    }
    isAdminOrAuthor(){
       if(this.authuser.type === 'admin' || this.authuser.type === 'author'){
           return true;
       }
    }

}
