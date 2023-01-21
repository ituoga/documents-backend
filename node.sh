#!/bin/bash

docker run --rm -it -v nodejs-libs:/usr/local/lib -v $(pwd):/app --workdir /app node $@
