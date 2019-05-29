#!/bin/sh

cp scripts/pre-commit .git/hooks/pre-commit
cp scripts/pre-commit.php .git/hooks/pre-commit.php
chmod +x .git/hooks/pre-commit