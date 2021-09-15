/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package nonWebConsole;

import java.util.Scanner;

/**
 *
 * @author Taufik
 */
public class konversiNilai {
    public long nim;
    public String nama = "", matkul = "", index;
    public double absen, tugas, uts, uas, total, grade;
    
    public void setNim(long ni) {
        this.nim = ni;
    }

    public long getNim(){
       return nim;
    }
    
    public void setNama(String na) {
        this.nama += na;
    }

    public String getNama(){
       return nama;
    }
    
    public void setMatkul(String ma) {
        this.matkul += ma;
    }

    public String getMatkul(){
       return matkul;
    }
    
    public void setAbsen(double ab) {
        this.absen = ab;
    }

    public double getAbsen(){
       return absen;
    }
    
    public void setTugas(double tu) {
        this.tugas = tu;
    }
    
    public double getTugas(){
       return tugas;
    }
    
    public void setUts(double ut) {
        this.uts = ut;
    }
    
    public double getUts(){
       return uts;
    }
    
    public void setUas(double ua) {
        this.uas = ua;
    }
    
    public double getUas(){
       return uas;
    }
}

class Konversi extends konversiNilai {
   
    public double getTotal(){
        return (2 * absen + 3 * tugas + 2 * uts + 3 * uas ) / 10;
    }
    
    public double getGradeIndeks(){
      if (getTotal()>= 85){
            grade = 4;
            index = "A";
            
        }
        else if(getTotal()>= 80 && getTotal() < 85){
            grade = 3.75;
            index= "A-";
        }
        else if(getTotal()>= 75 && getTotal() < 80){
            grade = 3.5;
            index= "B+";
        }
        else if(getTotal()>= 70 && getTotal() < 75){
            grade = 3;
            index="B";
        }
        else if(getTotal()>= 65 && getTotal() < 70){
            grade = 2.75;
            index= "B-";
        }
        else if(getTotal()>= 60 && getTotal() < 65){
            grade = 2.5;
            index="C+";
        } 
        else if(getTotal()>= 55 && getTotal() < 60){
            grade = 2;
            index= "C";
        }
        else if(getTotal()>= 40 && getTotal() < 55){
            grade = 1;
            index="D";
        }
        else{
            grade = 0;
            index="E";
        }
        System.out.println("Grade = "+grade);
        System.out.println("Index = "+index);
        return getTotal();
    } 
}

class Perhitungan extends konversiNilai {
    public static void main(String[] args) {
        String ulg = "y";
        while (ulg.equals("y"))
        {
        System.out.println(" ");
        Scanner input = new Scanner(System.in);
        
        //Judul Application
        System.out.println("=========================");
        System.out.println("==Aplikasi Hitung Balok==");
        System.out.println("=========================");
        
        //Membuat Scanner
        Scanner nim = new Scanner(System.in);
        Scanner nama = new Scanner(System.in);
        Scanner matkul = new Scanner(System.in);
        Scanner absen = new Scanner(System.in);
        Scanner tugas = new Scanner(System.in);
        Scanner uts = new Scanner(System.in);
        Scanner uas = new Scanner(System.in);
        
        //Membuat input
        Konversi kn = new Konversi();
        System.out.println("Input NIM :");
        while (true)
            try {
                kn.setNim(Long.parseLong(nim.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        System.out.println("Input Nama :");
        while (true)
            try {
                kn.setNama(String.valueOf(nama.nextLine())); 
                break;
            } catch (StringIndexOutOfBoundsException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        System.out.println("Input Mata Kuliah :");
        kn.setMatkul(matkul.nextLine());
        System.out.println("Input Nilai Partisipasi :");
        while (true)
            try {
                kn.setAbsen(Double.parseDouble(absen.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        System.out.println("Input Tugas :");
        while (true)
            try {
                kn.setTugas(Double.parseDouble(tugas.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        System.out.println("Input UTS :");
        while (true)
            try {
                kn.setUts(Double.parseDouble(uts.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        System.out.println("Input UAS :");
                while (true)
            try {
                kn.setUas(Double.parseDouble(uas.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
                

                
                
        // Output
        System.out.println("=======================================");
	System.out.println("Nim : " + kn.getNim()); //Mengambil nilai dari method getNim
	System.out.println("Nama : " + kn.getNama()); //Mengambil nilai dari method getNama
	System.out.println("Matakuliah : " + kn.getMatkul()); //Mengambil nilai dari method getMatkul
	System.out.println("Nilai Akhir : " + kn.getGradeIndeks()); //Mengambil nilai dari method getGradeIndeks
    
        System.out.println("=====================================");
        System.out.print("Apakah anda ingin menghitung ulang lagi (y/t)? ");
            ulg = input.next();
        }
    }
}
