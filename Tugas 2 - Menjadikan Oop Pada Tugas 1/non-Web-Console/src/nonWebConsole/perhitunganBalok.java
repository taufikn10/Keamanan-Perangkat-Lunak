/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package nonWebConsole;

/**
 *
 * @author Taufik
 */
import java.util.Scanner;

/**
 *
 * @author Taufik
 */
public class perhitunganBalok {
    public double panjang, lebar, tinggi, luas, volume;
    
    public void setPanjang(double p){
        this.panjang = p;
    }
    
    public double getPanjang(){
        return panjang;
    }
    
    public void setLebar(double l){
        this.lebar = l;
    }
    
    public double getLebar(){
        return lebar;
    }
    
    public void setTinggi(double t){
        this.tinggi = t;
    }
    
    public double getTinggi(){
        return tinggi;
    }
}

class Balok extends perhitunganBalok {
    
    public double getLuas(){
        return 2 * (getPanjang() * getLebar() + getPanjang() 
                * getTinggi() + getLebar()*getTinggi());
    }
    public double getVolume(){
        return getPanjang() * getLebar() * getTinggi();
    }
}

class Menghitung extends perhitunganBalok {
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
        Scanner panjang = new Scanner(System.in);
        Scanner lebar = new Scanner(System.in);
        Scanner tinggi = new Scanner(System.in);
       
        //Membuat Input
        Balok balok = new Balok();
        System.out.println("Input Panjang :");
        while (true)
            try {
                balok.setPanjang(Double.parseDouble(panjang.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi : ");
            }
        
        System.out.println("Input Lebar :");
        while (true)
            try {
                balok.setLebar(Double.parseDouble(lebar.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        
        System.out.println("Input Tinggi :");
        while (true)
            try {
                balok.setTinggi(Double.parseDouble(tinggi.nextLine())); 
                break;
            } catch (NumberFormatException nfe) {
                System.out.print("Ulangi Lagi: ");
            }
        
        // Membuat Output
        System.out.println("=======================================");
	System.out.println("Panjang : " + balok.getPanjang()); //Mengambil nilai dari method getPanjang
	System.out.println("Lebar : " + balok.getLebar()); //Mengambil nilai dari method getLebar
	System.out.println("Tinggi : " + balok.getTinggi()); //Mengambil nilai dari method getTinggi
	System.out.println("=======================================");
        System.out.println("Luas Permukaan Balok : " + balok.getLuas()+" cm2 "); //Mengambil nilai dari method getLuas
	System.out.println("Volume Balok : " + balok.getVolume()+" cm3 "); //Mengambil nilai dari method getVolume
        System.out.println("=====================================");
        System.out.println("*===By Taufik Nurrahman==*");
        System.out.print("Apakah anda ingin menghitung ulang lagi (y/t)? ");
            ulg = input.next();
        }
    }
        
}
