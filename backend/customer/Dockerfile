FROM openjdk:18
RUN mkdir /customer
WORKDIR /customer
ARG JAR_FILE=target/customer-0.0.1-SNAPSHOT.jar
ADD ${JAR_FILE} customer.jar
CMD ["java", "-jar", "customer.jar"]
#################################################################################################################################
# docker build -t customer -f Dockerfile .                                                                                          #
# docker run -p 9502 -d customer                                                                                                    #
# -t = tag                                                                                                                      #
# -f = Dockerfile                                                                                                               #
# -p = port -> ezt exposoljuk a www-nek (itt 9502, mert a service gateway mögött van)                                           #
# -d = detached -> background process, Dockerben lehet megnézni a service-t, ha simán írjuk, akkor elveszi a terminal sessionünk# 
#################################################################################################################################
