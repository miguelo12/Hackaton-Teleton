/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.rest.Modelo.DTO;

/**
 *
 * @author darkg
 */
public class UsuarioDTO {
    private int idUsuario;
    private String Nombre;
    private String password;
    private String Correo;
    private String IDfacebook;
    private int Telefono;

    public UsuarioDTO(int idUsuario, String Nombre, String password, String Correo, String IDfacebook, int Telefono) {
        this.idUsuario = idUsuario;
        this.Nombre = Nombre;
        this.password = password;
        this.Correo = Correo;
        this.IDfacebook = IDfacebook;
        this.Telefono = Telefono;
    }

    public UsuarioDTO() {
        this.idUsuario = 0;
        this.Nombre = "";
        this.password = "";
        this.Correo = "";
        this.IDfacebook = "";
        this.Telefono = 0;
    }
    
    

    public int getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(int idUsuario) {
        this.idUsuario = idUsuario;
    }

    public String getNombre() {
        return Nombre;
    }

    public void setNombre(String Nombre) {
        this.Nombre = Nombre;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getCorreo() {
        return Correo;
    }

    public void setCorreo(String Correo) {
        this.Correo = Correo;
    }

    public String getIDfacebook() {
        return IDfacebook;
    }

    public void setIDfacebook(String  IDfacebook) {
        this.IDfacebook = IDfacebook;
    }

    public int getTelefono() {
        return Telefono;
    }

    public void setTelefono(int Telefono) {
        this.Telefono = Telefono;
    }
    
    
    
}
