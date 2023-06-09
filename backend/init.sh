(cd $PWD/service-discovery && mvn clean package && docker build -t service-discovery -f Dockerfile .)
(cd $PWD/gateway && mvn clean package && docker build -t gateway -f Dockerfile .) 
(cd $PWD/auth && mvn clean package && docker build -t auth -f Dockerfile .) 
(cd $PWD/customer && mvn clean package && docker build -t customer -f Dockerfile .) 
(cd $PWD/vehicles && mvn clean package && docker build -t vehicles -f Dockerfile .) 
(cd $PWD/stock && mvn clean package && docker build -t stock -f Dockerfile .) 
(cd $PWD/quotation && mvn clean package && docker build -t quotation -f Dockerfile .) 
(cd $PWD/worksheet && mvn clean package && docker build -t worksheet -f Dockerfile .) 
docker compose up --detach
docker rmi $(docker images --filter "dangling=true" -q --no-trunc) 2>/dev/null
rm  ~/.docker/config.json 