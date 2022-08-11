<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $tableName = 'comments';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table)
        {
            $authorForeignKey = "author_id";

            $table->id();
            $table->text('text');
            $table->foreignId($authorForeignKey);
            $table->morphs("commentable");
            $table->timestamps();

            $table->foreign($authorForeignKey, "fk_{$authorForeignKey}_{$this->tableName}" )
                ->references('id')->on("users")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
