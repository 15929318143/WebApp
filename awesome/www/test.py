#!/usr/bin/env python
# coding=utf-8

import orm
import asyncio
import sys
from models import User, Blog, Comment

@asyncio.coroutine
def test(loop):
    yield from orm.create_pool(loop=loop, host='localhost', port='3306', user='www-data', password='www-data', db='awesome')
    u = User(name='root', email='test@example.com', password='123456', image='about:blank')
    yield from s.save()

loop = asyncio.get_event_loop()
loop.run_until_complete(test(loop))
loop.close()
if loop.is_closed():
    sys.exit(0)
