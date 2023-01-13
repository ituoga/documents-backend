#!/bin/bash
sudo chown -R 1000:1000 .
sudo chmod -R 777 bootstrap/cache storage
chmod +x .docker/entrypoint.sh
sudo chmod +x node.sh
