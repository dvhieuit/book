package io.spring.demo.configuration;

import javax.sql.DataSource;

import io.spring.demo.listener.JobNoticeCompletionListener;
import io.spring.demo.model.Customer;
import io.spring.demo.processor.CustomerItemProcessor;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.core.Job;
import org.springframework.batch.core.Step;
import org.springframework.batch.core.configuration.annotation.EnableBatchProcessing;
import org.springframework.batch.core.configuration.annotation.JobBuilderFactory;
import org.springframework.batch.core.configuration.annotation.StepBuilderFactory;
import org.springframework.batch.core.launch.support.RunIdIncrementer;
import org.springframework.batch.item.database.BeanPropertyItemSqlParameterSourceProvider;
import org.springframework.batch.item.database.JdbcBatchItemWriter;
import org.springframework.batch.item.file.FlatFileItemReader;
import org.springframework.batch.item.file.mapping.BeanWrapperFieldSetMapper;
import org.springframework.batch.item.file.mapping.DefaultLineMapper;
import org.springframework.batch.item.file.transform.DelimitedLineTokenizer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.core.io.ClassPathResource;

@Configuration
@EnableBatchProcessing
public class BatchConfiguration {
    private static final Logger log = LoggerFactory.getLogger(BatchConfiguration.class);

    @Autowired
    public JobBuilderFactory jobBuilderFactory;

    @Autowired
    public StepBuilderFactory stepBuilderFactory;

    @Autowired
    public DataSource dataSource;

    @Bean
    public Job importCustomerJob(JobNoticeCompletionListener listener){
        log.info("start job");
        return jobBuilderFactory.get("importCustomerJob")
                .incrementer(new RunIdIncrementer())
                .listener(listener)
                .flow(step1())
                .end()
                .build();
    }
    @Bean
    public Step step1(){
        log.info("start step");
        return stepBuilderFactory.get("step1")
                .<Customer, Customer> chunk(10)
                .reader(reader())
                .processor(processor())
                .writer(writer())
                .build();
    }

    @Bean
    public FlatFileItemReader<Customer> reader(){
        log.info("read file");
        FlatFileItemReader<Customer> reader =new FlatFileItemReader<>();
        reader.setResource(new ClassPathResource("customer_data.csv"));
        reader.setLineMapper(new DefaultLineMapper<Customer>(){{
            setLineTokenizer(new DelimitedLineTokenizer(){{
                setNames(new String[]{ "id", "firstName", "lastName", "email", "phone", "address"});
            }});
            setFieldSetMapper(new BeanWrapperFieldSetMapper<Customer>(){{
                setTargetType(Customer.class);
        }});
        }});
        return reader;
    }

    @Bean
    public CustomerItemProcessor processor(){
        return new CustomerItemProcessor();
    }

    @Bean
    public JdbcBatchItemWriter<Customer> writer(){
        log.info("write into database");
        JdbcBatchItemWriter<Customer> writer = new JdbcBatchItemWriter<>();
        writer.setItemSqlParameterSourceProvider(new BeanPropertyItemSqlParameterSourceProvider<>());
        writer.setSql("INSERT INTO customer(id, first_name, last_name,email, phone, address) VALUES (:id, :firstName, :lastName, :email, :phone, :address)");
        writer.setDataSource(dataSource);
        return writer;
    }
}