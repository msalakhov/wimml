<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240310190236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates Expenses table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE expenses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE expenses (id BIGINT NOT NULL, name VARCHAR(255) NOT NULL, implementation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, amount NUMERIC(20, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN expenses.implementation_date IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE expenses_id_seq CASCADE');
        $this->addSql('DROP TABLE expenses');
    }
}
