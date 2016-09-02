/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.rest.Modelo.DAO;

import com.mycompany.rest.Modelo.Conexion;
import com.mycompany.rest.Modelo.DTO.UsuarioDTO;
import java.sql.Statement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author darkg
 */
public class UsuarioDAO {
    Statement instruction;
    
    public UsuarioDAO() throws Exception
    {
        Conexion c = new Conexion();
        instruction = c.getStatement();
    }
    
    public UsuarioDTO Validar(String user, String password) throws Exception{
        ResultSet res;
        UsuarioDTO aResult;
        aResult = new UsuarioDTO();
        
        try
        {
            res = instruction.executeQuery("SELECT * FROM usuario WHERE Correo ='"+user+"' and password='"+password+"'");
        }catch(SQLException ex){ 
            String msg="No se pudo ejecutar la consulta";
            throw new Exception(msg);
        }
        while(res.next()){
            
        aResult.setIdUsuario(Integer.parseInt(res.getString("idUsuario")));
        aResult.setNombre(res.getString("Nombre"));
        aResult.setCorreo(res.getString("Correo"));
        aResult.setIDfacebook(res.getString("IDfacebook"));
        aResult.setTelefono(Integer.parseInt(res.getString("Telefono")));
        
        }
        
        return aResult;
    }
    
    public UsuarioDTO EntregarPorEmail(String user) throws Exception{
        ResultSet res;
        UsuarioDTO aResult;
        aResult = new UsuarioDTO();
        
        try
        {
            res = instruction.executeQuery("SELECT * FROM usuario WHERE Correo ='"+user+"'");
        }catch(SQLException ex){ 
            String msg="No se pudo ejecutar la consulta";
            throw new Exception(msg);
        }
        while(res.next()){
            
        aResult.setIdUsuario(Integer.parseInt(res.getString("idUsuario")));
        aResult.setNombre(res.getString("Nombre"));
        aResult.setCorreo(res.getString("Correo"));
        aResult.setIDfacebook(res.getString("IDfacebook"));
        aResult.setTelefono(Integer.parseInt(res.getString("Telefono")));
        
        }
        
        return aResult;
    }
    
    public boolean ValidarEmail(String user) throws Exception{
        ResultSet res;
        
        try
        {
            res = instruction.executeQuery("SELECT * FROM usuario WHERE Correo='"+user+"'");
        }catch(SQLException ex){ 
            String msg="No se pudo ejecutar la consulta";
            throw new Exception(msg);
        }
        while(res.next()){
            
        return true;
        
        }
        
        return false;
    }
    
    public int guardar(String nombre, String pass, String email) throws Exception
    {
        int res=0;
        String sql="insert into usuario (idUsuario,Nombre,Password,Correo,IDfacebook,Telefono) values("+0+",'"+nombre+"','"+pass+"','"+email+"',"+null+","+0+")";
        try{
            res= instruction.executeUpdate(sql);
        }catch(SQLException ex){
            String msg="No se pudo guardar el dato";
            if(ex.getErrorCode()==1062){ 
                msg="El registro ya existe";
            }else{
                throw new Exception(msg);
            }
        }
        return res;
    }
}
