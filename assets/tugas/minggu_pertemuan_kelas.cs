using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Elearningta
{
    #region Minggu_pertemuan_kelas
    public class Minggu_pertemuan_kelas
    {
        #region Member Variables
        protected int _id;
        protected int _KodePertemuan;
        protected string _KodeKelas;
        protected string _KodeGuru;
        protected string _KodeMapel;
        #endregion
        #region Constructors
        public Minggu_pertemuan_kelas() { }
        public Minggu_pertemuan_kelas(int KodePertemuan, string KodeKelas, string KodeGuru, string KodeMapel)
        {
            this._KodePertemuan=KodePertemuan;
            this._KodeKelas=KodeKelas;
            this._KodeGuru=KodeGuru;
            this._KodeMapel=KodeMapel;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int KodePertemuan
        {
            get {return _KodePertemuan;}
            set {_KodePertemuan=value;}
        }
        public virtual string KodeKelas
        {
            get {return _KodeKelas;}
            set {_KodeKelas=value;}
        }
        public virtual string KodeGuru
        {
            get {return _KodeGuru;}
            set {_KodeGuru=value;}
        }
        public virtual string KodeMapel
        {
            get {return _KodeMapel;}
            set {_KodeMapel=value;}
        }
        #endregion
    }
    #endregion
}