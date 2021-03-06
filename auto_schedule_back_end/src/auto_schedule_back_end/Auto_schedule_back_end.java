/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.ServerSocket;
import java.net.Socket;

/**
 *
 * @author maruli
 */
public class Auto_schedule_back_end {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {


        //
        MsgLog.write("java server stared");

        int port = 20222;
        ServerSocket listenSock = null; //the listening server socket
        Socket sock = null;			 //the socket that will actually be used for communication
        MyThread td = new MyThread();

//        System.out.println("getActivePeriode()\n");
//        Periode activePeriode = new Periode();
//        System.out.println(activePeriode.getPeriode());
//        
        try {

            listenSock = new ServerSocket(port);

            while (true) {	   //we want the server to run till the end of times

                sock = listenSock.accept();			 //will block until connection recieved

                BufferedReader br = new BufferedReader(new InputStreamReader(sock.getInputStream()));
                BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(sock.getOutputStream()));
                String line = "";
                while ((line = br.readLine()) != null) {
                    //execution time
                    long startTime = System.nanoTime();

                    //write log
//                    MsgLog.write("php sent : " + line);
                    String msg = "";
                    if ("0".equals(line)) {
                        //check doang
                        if(td.isAlive())
                            msg = "true";
                        else
                            msg = "false";
                        
                        bw.write(td.isAlive() + "\n");
                    } else {
                        if (!td.isAlive()) {
                            bw.write("true" + "\n");
                            td = new MyThread(startTime);
                            td.start();
                            
                            msg = "true";
                        } else {
                            bw.write("true");
                        }
                    }
                    bw.flush();
//                    MsgLog.write("java sent : " + msg);
                }

                //Closing streams and the current socket (not the listening socket!)
//                bw.close();
//                br.close();
//                sock.close();
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }
}
