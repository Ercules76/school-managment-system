<?php

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;

return new class
{
    public function up(Schema $schema): void
    {
        $table = $schema->createTable('useraccount');
        $table->addColumn('account_id', Types::INTEGER, ['autoincrement' => true, 'unsigned' => true]);
        $table->addColumn('account_name', Types::STRING, ['length' => 255, 'notnull' => true]);
        $table->addColumn('account_username', Types::STRING, ['length' => 255, 'notnull' => true]);
        $table->addColumn('account_password', Types::TEXT, ['notnull' => true]);
        $table->addColumn('account_type', Types::STRING, ['length' => 30, 'notnull' => true]);
        $table->addColumn('created_at', Types::DATETIME_IMMUTABLE, ['default' => 'CURRENT_TIMESTAMP']);
        $table->setPrimaryKey(['account_id']);
        $table->addUniqueIndex(['account_username']);
    }

    public function down(Schema $schema): void
    {
        echo get_class($this) . ' "down" method called' . PHP_EOL;
    }
};