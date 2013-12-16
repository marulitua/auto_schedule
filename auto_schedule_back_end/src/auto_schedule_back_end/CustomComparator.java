/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package auto_schedule_back_end;

import java.util.Comparator;

/**
 *
 * @author maruli
 */
public class CustomComparator implements Comparator<Kurikulum> {
    
//    @Override
//    public int compare(Kurikulum o1, Kurikulum o2) {
//        return o1.getOptionValue() > o2.getOptionValue() ? 1 : o1.getOptionValue() < o2.getOptionValue() ? -1 : 0; //To change body of generated methods, choose Tools | Templates.
//    }
    
    @Override
    public int compare(Kurikulum o1, Kurikulum o2) {
        return o1.getSolutionSpace().size() > o2.getSolutionSpace().size() ? 1 : o1.getSolutionSpace().size() < o2.getSolutionSpace().size() ? -1 : 0; //To change body of generated methods, choose Tools | Templates.
    }
    
}
