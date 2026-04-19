<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseHoleDistances Model
 *
 * @property \App\Model\Table\CourseHolesTable&\Cake\ORM\Association\BelongsTo $CourseHoles
 * @property \App\Model\Table\CourseTeesTable&\Cake\ORM\Association\BelongsTo $CourseTees
 *
 * @method \App\Model\Entity\CourseHoleDistance newEmptyEntity()
 * @method \App\Model\Entity\CourseHoleDistance newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseHoleDistance> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseHoleDistance get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CourseHoleDistance findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CourseHoleDistance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CourseHoleDistance> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseHoleDistance|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CourseHoleDistance saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHoleDistance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHoleDistance>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHoleDistance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHoleDistance> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHoleDistance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHoleDistance>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CourseHoleDistance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CourseHoleDistance> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CourseHoleDistancesTable extends Table
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

        $this->setTable('course_hole_distances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CourseHoles', [
            'foreignKey' => 'course_hole_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CourseTees', [
            'foreignKey' => 'course_tee_id',
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
            ->integer('course_hole_id')
            ->notEmptyString('course_hole_id');

        $validator
            ->integer('course_tee_id')
            ->notEmptyString('course_tee_id');

        $validator
            ->integer('distance')
            ->requirePresence('distance', 'create')
            ->notEmptyString('distance');

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
        $rules->add($rules->isUnique(['course_hole_id', 'course_tee_id']), ['errorField' => 'course_hole_id', 'message' => __('This combination of course_hole_id and course_tee_id already exists')]);
        $rules->add($rules->existsIn(['course_hole_id'], 'CourseHoles'), ['errorField' => 'course_hole_id']);
        $rules->add($rules->existsIn(['course_tee_id'], 'CourseTees'), ['errorField' => 'course_tee_id']);

        return $rules;
    }
}
