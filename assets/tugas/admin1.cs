using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Elearningta
{
    #region Admin
    public class Admin
    {
        #region Member Variables
        protected int _id_admin;
        protected string _NamaAdmin;
        protected string _NIP;
        protected unknown _JenisKelamin;
        protected int _id_user;
        protected string _foto;
        #endregion
        #region Constructors
        public Admin() { }
        public Admin(string NamaAdmin, string NIP, unknown JenisKelamin, int id_user, string foto)
        {
            this._NamaAdmin=NamaAdmin;
            this._NIP=NIP;
            this._JenisKelamin=JenisKelamin;
            this._id_user=id_user;
            this._foto=foto;
        }
        #endregion
        #region Public Properties
        public virtual int Id_admin
        {
            get {return _id_admin;}
            set {_id_admin=value;}
        }
        public virtual string NamaAdmin
        {
            get {return _NamaAdmin;}
            set {_NamaAdmin=value;}
        }
        public virtual string NIP
        {
            get {return _NIP;}
            set {_NIP=value;}
        }
        public virtual unknown JenisKelamin
        {
            get {return _JenisKelamin;}
            set {_JenisKelamin=value;}
        }
        public virtual int Id_user
        {
            get {return _id_user;}
            set {_id_user=value;}
        }
        public virtual string Foto
        {
            get {return _foto;}
            set {_foto=value;}
        }
        #endregion
    }
    #endregion
}