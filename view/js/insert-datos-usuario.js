export function insert__datos__usuario(){
    let formulario__registro = document.getElementById('formulario-registro-usuario');
    if(formulario__registro){
     formulario__registro.addEventListener('submit',function(evento){
        evento.preventDefault();
        
        let data = new FormData(document.getElementById('formulario-registro-usuario'))
        fetch('insert-datos-usuario',{
            method:'POST',
            body:data
        }).then(respuesta => respuesta.json())
        .then(datos =>{
           if(datos == 'true'){
            window.location.href = './dashboard-usuario';

           }else{
            Swal.fire({
                icon: 'error',
                title: `${datos}`,
                footer: 'Esta informacion es importante',
               
              })
           }
        })
     })
    }
}


export function  insert__login__usuario(){
  let login__usuario = document.getElementById('formulario-login');
  if(login__usuario){
    login__usuario.addEventListener('submit',function(evento){
        evento.preventDefault();
        
        let datos = new FormData(document.getElementById('formulario-login'));
        fetch('insert-login-usuario',{
            method:'POST',
            body:datos

        }).then(respuesta => respuesta.json())
        .then(data =>{
            if(data ==  'true'){
                window.location.href = './dashboard-usuario';
            }else{
                Swal.fire({
                    icon: 'error',
                    title: `${data}`,
                    footer: 'Esta informacion es importante',
                   
                  })
            }
        })
    })
  }  
}