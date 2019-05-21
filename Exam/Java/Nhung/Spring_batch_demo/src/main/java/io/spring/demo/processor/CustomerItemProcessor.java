package io.spring.demo.processor;


import io.spring.demo.model.Customer;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.item.ItemProcessor;

public class CustomerItemProcessor implements ItemProcessor<Customer, Customer> {
    private static final Logger log = LoggerFactory.getLogger(CustomerItemProcessor.class);

    @Override
    public Customer process(Customer customer) throws Exception{
        Integer id = customer.getId();
        String firstName = customer.getFirstName();
        String lastName = customer.getLastName();
        String email = customer.getEmail();
        String phone = customer.getPhone();
        String address = customer.getAddress();

        final Customer transformedCustomer = new Customer(id, firstName, lastName, email, phone, address);

        log.info("Converting ("+customer+") into ("+transformedCustomer+")");

        return transformedCustomer;
    }
}
