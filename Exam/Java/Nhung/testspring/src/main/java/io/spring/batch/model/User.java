package io.spring.batch.model;

public class User {
    private Integer id;
    private String firstName;
    private String lastName;
    private String email;
    private String phone;
    private String address;

    public User(Integer id,String firstName, String lastName, String email, String phone, String address ) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.phone = phone;
        this.address = address;

    }
    public Integer getId(){return id;}
    public void setId(Integer id) { this.id = id; }

    public String getFirstName() {
        return firstName;
    }
    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }
    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getEmail(){return  email;}
    public void setEmail(String email) { this.email = email; }

    public String getPhone(){return phone;}
    public void setPhone(String phone) { this.phone = phone; }

    public String getAddress(){return address;}
    public void setAddress(String address) { this.address = address; }

    @Override
    public String toString() {
        return "id:"+ id +", firstName: " + firstName + ", lastName:"+lastName+", email:"+ email +", phone:" + phone + ", address:"+ address;
    }
}
