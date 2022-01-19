# Converting datatypes in Java

### int to string
    
    String myString = Integer.toString(my int value) or String str = "" + i;

### String to int

    int i = Integer.parseInt(str);   or int i = Integer.valueOf(str).intValue();

### double to String

    String str = Double.toString(i);

### long to String

    String str = Long.toString(l);

### float to String

    String str = Float.toString(f);

### String to double

    double d = Double.valueOf(str).doubleValue();

### String to long

    long l = Long.valueOf(str).longValue(); or long l = Long.parseLong(str);

### String to float

    float f = Float.valueOf(str).floatValue();

### decimal to binary

    int i = 42;
    String binstr = Integer.toBinaryString(i);

### decimal to hexadecimal

    int i = 42;
    String hexstr = Integer.toString(i, 16);

or

    String hexstr = Integer.toHexString(i);

or (with leading zeroes and uppercase)

    public class Hex 
    {
        public static void main(String args[])
        {
            int i = 42;
            System.out.print
                (Integer.toHexString( 0×10000 | i).substring(1).toUpperCase());
        }
    }

### hexadecimal to integer

    int i = Integer.valueOf("B8DA3", 16).intValue(); or int i = Integer.parseInt("B8DA3", 16); 

### ASCII code to String

    int i = 64;
    String aChar = new Character((char)i).toString();

### integer to ASCII code (byte)

    char c = ‘A’;
    int i = (int) c; // i will have the value 65 decimal

### integer to boolean

    b = (i != 0);

### boolean to integer

    i = (b)?1:0;

