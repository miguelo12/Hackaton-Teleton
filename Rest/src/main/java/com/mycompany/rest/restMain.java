/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.rest;
import static spark.Spark.*;
import com.mycompany.rest.Modelo.DAO.UsuarioDAO;
import com.mycompany.rest.Modelo.DTO.UsuarioDTO;
import org.json.JSONObject;

/**
 *
 * @author darkg
 */
public class restMain {
    public static void main(String[] args) {
        get("/validar/:user/to/:pass", (request, response) -> {
            request.session(true);
            String user, password;
        
            user = request.params(":user").trim();
            password = request.params(":pass").trim();
        
            if(!user.equals("") && !password.equals(""))
            {
                
                try
                {
                   UsuarioDAO use =new UsuarioDAO();
                   UsuarioDTO user1 = use.Validar(user.trim(), password);

                   if(!user1.getCorreo().equals("")){
                      
                      JSONObject obj = new JSONObject();
                      
                      obj.put("id", user1.getIdUsuario());
                      obj.put("name", user1.getNombre());
                      obj.put("email", user1.getCorreo());
                      obj.put("idfacebook", user1.getIDfacebook());
                      obj.put("telefono", user1.getTelefono());
                       
                      request.session().attribute("user", obj);
                      return obj;
                   }
                }
                catch(Exception ex)
                {
                   String mensaje = ex.getMessage();
                      request.session().attribute("error", mensaje);
                      return mensaje;
                }
            }
            
            return "no funciono";
            
        });
        
        get("/validarUsuarioLogin/:user", (request, response) -> {
            request.session(true);
            String user;
        
            user = request.params(":user");
            
            if(!user.equals(""))
            {
                
                try
                {
                   UsuarioDAO use =new UsuarioDAO();
                   boolean user1 = use.ValidarEmail(user.trim());
                        
                   if(user1){
                      UsuarioDTO user3 = use.EntregarPorEmail(user.trim());
                      JSONObject obj = new JSONObject();
                      
                      obj.put("id", user3.getIdUsuario());
                      obj.put("name", user3.getNombre());
                      obj.put("email", user3.getCorreo());
                      obj.put("idfacebook", user3.getIDfacebook());
                      obj.put("telefono", user3.getTelefono());
                       
                      request.session().attribute("user", obj);
                      
                      
                      response.redirect("http://localhost:8084/ideaton2/loginfacebook?json1="+obj);
                      
                      
                   }
                   else{
                      response.redirect("http://localhost:8084/ideaton2/registro.jsp?error=2");
                   }
                }
                catch(Exception ex)
                {
                   String mensaje = ex.getMessage();
                      request.session().attribute("error", mensaje);
                      return mensaje;
                }
            }
            
            return "no funciono";
            
        });
        
        get("/validarEmail/:email/:nombre", (request, response) -> {
            
            String user, nombre;
        
            user = request.params(":email").trim();
            nombre = request.params(":nombre").trim();
            
            if(!user.equals(""))
            {
                
                try
                {
                   UsuarioDAO use =new UsuarioDAO();
                   boolean user1 = use.ValidarEmail(user.trim());
                   
                   if(!user1){
                      response.redirect("http://localhost:8084/ideaton2/registrarFacebook?name="+nombre+"&email="+user);
                   }
                   else{
                      response.redirect("http://localhost:8084/ideaton2/login.jsp?error=1");
                   }
                   
                }
                catch(Exception ex)
                {
                   String mensaje = ex.getMessage();
                      request.session().attribute("error", mensaje);
                      return mensaje;
                }
            }
            
            return "no funciono";
            
        });
        
        post("/Ingresar", (request, response) -> {
            
            String user, nombre, pass;
        
            user = request.queryParams("email").trim();
            nombre = request.queryParams("nombre").trim();
            pass = request.queryParams("pass");
            
            if(!user.equals(""))
            {
                
                try
                {
                   UsuarioDAO use =new UsuarioDAO();
                   boolean user2 = use.ValidarEmail(user.trim());
                   int user1 = use.guardar(nombre.trim(), pass, user.trim());
                   
                   if(!user2){
                      response.redirect("http://localhost:8084/ideaton2/login.jsp?exito=1");
                      
                   }
                   else{
                      response.redirect("http://localhost:8084/ideaton2/registro.jsp?error=1");
                   }
                   
                }
                catch(Exception ex)
                {
                   String mensaje = ex.getMessage();
                      request.session().attribute("error", mensaje);
                      return mensaje;
                }
            }
            
            return "no funciono";
            
        });
    }   
}
