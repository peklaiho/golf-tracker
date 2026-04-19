<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoundHoles Model
 *
 * @property \App\Model\Table\RoundsTable&\Cake\ORM\Association\BelongsTo $Rounds
 * @property \App\Model\Table\CourseHolesTable&\Cake\ORM\Association\BelongsTo $CourseHoles
 *
 * @method \App\Model\Entity\RoundHole newEmptyEntity()
 * @method \App\Model\Entity\RoundHole newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RoundHole> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoundHole get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RoundHole findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RoundHole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RoundHole> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoundHole|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RoundHole saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RoundHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RoundHole>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RoundHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RoundHole> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RoundHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RoundHole>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RoundHole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RoundHole> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RoundHolesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('round_holes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rounds', [
            'foreignKey' => 'round_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CourseHoles', [
            'foreignKey' => 'course_hole_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('round_id')
            ->notEmptyString('round_id');

        $validator
            ->integer('course_hole_id')
            ->notEmptyString('course_hole_id');

        $validator
            ->integer('strokes')
            ->requirePresence('strokes', 'create')
            ->notEmptyString('strokes');

        $validator
            ->integer('fairway_hit')
            ->allowEmptyString('fairway_hit');

        $validator
            ->integer('green_in_reg')
            ->allowEmptyString('green_in_reg');

        $validator
            ->integer('putts')
            ->allowEmptyString('putts');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['round_id', 'course_hole_id']), ['errorField' => 'round_id', 'message' => __('This combination of round_id and course_hole_id already exists')]);
        $rules->add($rules->existsIn(['round_id'], 'Rounds'), ['errorField' => 'round_id']);
        $rules->add($rules->existsIn(['course_hole_id'], 'CourseHoles'), ['errorField' => 'course_hole_id']);

        return $rules;
    }
}
